async function obtenerToken() {
    // Comprobar si ya existe un token almacenado
    let token = localStorage.getItem("joke_token");
    if (!token) {
      try {
        // Si no existe, se solicita el token a la API
        const respuesta = await fetch("http://chistes.alpati.net/create_joke_token", {
          method: "POST"
        });
        if (!respuesta.ok) {
          throw new Error("Error al obtener el token");
        }
        const datos = await respuesta.json();
        token = datos.joke_token;
        // Se almacena el token en localStorage para usos futuros
        localStorage.setItem("joke_token", token);
      } catch (error) {
        console.error("Error:", error);
      }
    }
    return token;
  }
  
  // Ejemplo de uso:
  obtenerToken().then(token => {
    console.log("Token obtenido:", token);
  });
  