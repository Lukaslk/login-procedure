//Função responsável por manipular as bordas da box

function alterBorder(bdr) {
    allBorder = Number(bdr)

    const box = document.getElementById('box').style

    box.borderRadius = (allBorder) + 'px'
}

//Função responsável por alterar a cor da box

function alterColor() {
    colorBox = document.getElementById('color').value

    const box = document.getElementById('box').style

    box.backgroundColor = colorBox
}

//Função responsável por mover a box

function moveBox() {
    locationBox = document.getElementById('location').value

    const box = document.getElementById('box').style

    box.marginLeft = (locationBox) + 'px'
}