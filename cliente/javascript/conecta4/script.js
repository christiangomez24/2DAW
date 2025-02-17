// script.js
const ROWS = 6;
const COLUMNS = 7;
const board = [];
let currentPlayer = 'red';

// Crea el tablero inicial
function initializeBoard() {
  for (let r = 0; r < ROWS; r++) {
    board[r] = [];
    for (let c = 0; c < COLUMNS; c++) {
      board[r][c] = null;
    }
  }
}

// Renderiza el tablero en HTML
function renderBoard() {
  const boardDiv = document.getElementById('board');
  boardDiv.innerHTML = ''; // Limpia el tablero existente

  for (let r = 0; r < ROWS; r++) {
    for (let c = 0; c < COLUMNS; c++) {
      const cell = document.createElement('div');
      cell.classList.add('cell');
      if (board[r][c]) {
        cell.classList.add(board[r][c]);
      }
      cell.dataset.row = r;
      cell.dataset.column = c;
      cell.addEventListener('click', handleCellClick);
      boardDiv.appendChild(cell);
    }
  }
}

// Maneja el clic en una celda
function handleCellClick(event) {
  const column = parseInt(event.target.dataset.column);

  // Encuentra la fila más baja disponible en esta columna
  for (let r = ROWS - 1; r >= 0; r--) {
    if (!board[r][column]) {
      board[r][column] = currentPlayer;
      renderBoard();
      if (checkWinner(r, column)) {
        setTimeout(() => alert(`${currentPlayer.toUpperCase()} ha ganado!`), 10);
        document.querySelectorAll('.cell').forEach(cell => cell.removeEventListener('click', handleCellClick));
      } else {
        currentPlayer = currentPlayer === 'red' ? 'yellow' : 'red';
      }
      break;
    }
  }
}

// Verifica si hay un ganador
function checkWinner(row, column) {
  const directions = [
    { dr: 0, dc: 1 },  // Horizontal
    { dr: 1, dc: 0 },  // Vertical
    { dr: 1, dc: 1 },  // Diagonal (hacia abajo)
    { dr: 1, dc: -1 }  // Diagonal (hacia arriba)
  ];

  for (let { dr, dc } of directions) {
    let count = 1;

    // Revisa hacia adelante
    for (let i = 1; i < 4; i++) {
      const r = row + dr * i;
      const c = column + dc * i;
      if (r >= 0 && r < ROWS && c >= 0 && c < COLUMNS && board[r][c] === currentPlayer) {
        count++;
      } else {
        break;
      }
    }

    // Revisa hacia atrás
    for (let i = 1; i < 4; i++) {
      const r = row - dr * i;
      const c = column - dc * i;
      if (r >= 0 && r < ROWS && c >= 0 && c < COLUMNS && board[r][c] === currentPlayer) {
        count++;
      } else {
        break;
      }
    }

    if (count >= 4) return true;
  }

  return false;
}

// Reinicia el juego
document.getElementById('restart').addEventListener('click', () => {
  initializeBoard();
  currentPlayer = 'red';
  renderBoard();
});

// Inicialización
initializeBoard();
renderBoard();
