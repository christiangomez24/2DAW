const client = new XMLHttpRequest();

client.addEventListener("readystatechange", () => {
  const isDone = client.readyState === 4;
  const isOk = client.status === 200;

  if (isDone && isOk) {
    console.log(client.responseText);
  }
});

client.open("GET", "https://pokeapi.co/api/v2/pokemon/");
client.send();