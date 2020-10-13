function toucheentree(event) {
  var x = event.keyCode;
  console.log(x);
  if (x === 13) {
    console.log ("You pressed the ENTER key!");
    recherche();
    event.stopPropagation();
  }
}

function recherche() {

console.log(aleris);

    let r = 0;
    let motus = document.getElementById('search').value.toLowerCase();
    console.log('search= '+motus);
    let result = [];
    for (let i = 0; i < aleris.length; i++) {
        result[i] = aleris[i].contenu.toLowerCase().split(' ');
        console.log(result[i]);
        for (let j = 0; j < result.length; j++) {
            let c = result[j].includes(motus);
            if (c === true) {
                r = aleris[i].page;
                window.open(r);
            }
        }
    }

}

