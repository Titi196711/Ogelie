
function ccn() {

    console.log(ccn);

    let r = 0;
    let motus = document.getElementById('convention').value.toLowerCase();
    console.log('convention= ' + motus);
    let result = [];
    for (let i = 0; i < ccn.length; i++) {
        result[i] = ccn[i].ccn.toLowerCase().split(' ');
        console.log(result[i]);
        for (let j = 0; j < result.length; j++) {
            let c = result[j].includes(motus);
            if (c === true) {
                document.getElementById('convetion').textContent = ccn[i];
            }
        }
    }
}

