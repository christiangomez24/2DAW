// Configuración de URLs
const API_BASE_URL = "https://api.open-meteo.com/v1/forecast";
const CITY_API_URL = "http://www.alpati.net/DWEC/cities/";

// Manejar el evento de búsqueda
document.getElementById("search-btn").addEventListener("click", async () => {
    const query = document.getElementById("city-search").value.trim();
    if (!query) return; // Si query es falsy, no se ejecutará nada más verificando que query tiene un valor válido.

    // Obtener ciudades que coincidan con la búsqueda
    const cities = await fetchCities(query);
    if (cities.length === 0) {
        alert("No se encontraron ciudades con ese nombre.");
        return;
    }

    // Obtener la primera ciudad encontrada
    const { latitude, longitude, name } = cities[0];
    // Obtener datos meteorológicos para la ciudad
    const weatherData = await fetchWeather(latitude, longitude);

    // Renderizar los datos meteorológicos
    renderWeather(weatherData, name);
});

// Obtener ciudades
async function fetchCities(query) {
    try {
        const response = await fetch(CITY_API_URL);
        const data = await response.json();
        // Filtrar y mapear los datos de las ciudades
        return data.filter(city => city[1] && city[1].toLowerCase().includes(query.toLowerCase()))
            .map(city => ({
                name: city[1],
                latitude: parseFloat(city[3]),
                longitude: parseFloat(city[4]),
            }));
    } catch (error) {
        console.error("Error al obtener ciudades:", error);
        return [];
    }
}

// Obtener datos meteorológicos
async function fetchWeather(latitude, longitude) {
    try {
        const url = `${API_BASE_URL}?latitude=${latitude}&longitude=${longitude}&current=temperature_2m,relative_humidity_2m,apparent_temperature,precipitation,wind_speed_10m&hourly=temperature_2m,precipitation_probability,precipitation,wind_speed_10m&daily=temperature_2m_max&timezone=Europe/Madrid`;
        const response = await fetch(url);
        return await response.json();
    } catch (error) {
        console.error("Error al obtener datos meteorológicos:", error);
        return null;
    }
}

// Mostrar datos meteorológicos
function renderWeather(data, cityName) {
    const infoDiv = document.getElementById("weather-info");

    if (!data || !data.daily || !data.daily.time) {
        infoDiv.innerHTML = `<p>No hay datos meteorológicos disponibles para ${cityName}.</p>`;
        return;
    } 

    // Crear tabla actual
    const actualTable = data.daily.time.map((date, index) => `
    <tr>
        <td>${date}</td>
        <td>${data.daily.temperature_2m_max[index]} °C</td>
    </tr>
`).join("");

    // Crear tabla de temperaturas diarias
    const dailyTable = data.daily.time.map((date, index) => `
        <tr>
            <td>${date}</td>
            <td>${data.daily.temperature_2m_max[index]} °C</td>
        </tr>
    `).join("");

    // Insertar la información meteorológica en el DOM
    infoDiv.innerHTML = `
        <h2>Pronóstico para ${cityName}</h2>
        <p>Zona horaria: ${data.timezone} | Elevación: ${data.elevation} m</p>
        <h3>Temperatura Actual</h3>
        <table border="0">
            <thead>
                <tr>
                    <th>Temperatura</th>
                    <th>Humedad relativa</th>
                    <th>Sensación Térmica</th>
                    <th>Precipitaciones</th>
                    <th>Viento</th>
                </tr>
            <tbody>
                ${actualTable}
            </tbody>
        </table>
        <h3>Temperaturas Diarias</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Temp. Máxima</th>
                </tr>
            </thead>
            <tbody>
                ${dailyTable}
            </tbody>
        </table>
    `;

    // Si hay datos horarios, dibujar la gráfica
    if (data.hourly && data.hourly.time && data.hourly.temperature_2m) {
        renderChart(data.hourly.time, data.hourly.temperature_2m);

        renderLluvia(data.hourly.time, data.hourly.precipitation_probability);
    }
}

// Dibujar gráfica
function renderChart(labels, data) {
    const ctx = document.getElementById("weather-chart").getContext("2d");
    new Chart(ctx, {
        type: "line",
        data: {
            labels,
            datasets: [{
                label: "Temperatura (°C)",
                data,
                borderColor: "red",
                borderWidth: 1,
            }],
        },
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'hour',
                    },
                },
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}

function renderLluvia(labels, data) {
    const ctx = document.getElementById("weather-chart-lluvia").getContext("2d");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels,
            datasets: [{
                label: "Probabilidad de lluvia (%)",
                data,
                borderColor: "blue",
                borderWidth: 1,
            }],
        },
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'day',
                    },
                },
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}
