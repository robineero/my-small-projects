fetch("https://cat-fact.herokuapp.com/facts/random")
    .then(response => response.json())
    .then(body => displayCatFact(body));

function displayCatFact(fact) {

    let div = document.getElementById("cat-fact");
    div.innerText = "🐱 " + fact.text;

}
