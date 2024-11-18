const imgComunidade = document.querySelector('.fotoComunidade');

const fileImgComunidade = document.querySelector('#fotoComunidade')

const dropAreaBanner = document.querySelector('#drag-area-banner');
const fileBanner = document.querySelector('#imgCapa');
const viewBanner = document.querySelector('.img-view-banner');

fileImgComunidade.addEventListener('change', function (event) {
    var file = event.target.files[0];
    let linkImg = URL.createObjectURL(file);

    if (file) {
        imgComunidade.src=linkImg
    } else {
        imgComunidade.src='{{asset("assets/img/foto-perfil/".$perfil->fotoPerfil)}}'
    }
})

fileBanner.addEventListener('change', uploadImage);

function uploadImage() {
    let linkImg = URL.createObjectURL(fileBanner.files[0])

    viewBanner.style.backgroundImage = `url(${linkImg})`
    viewBanner.textContent=''
    dropAreaBanner.style.border=0
}

dropAreaBanner.addEventListener('dragover', function(e){
    e.preventDefault()
})

dropAreaBanner.addEventListener('drop', function(e){
    e.preventDefault()

    fileBanner.files=e.dataTransfer.files;

    uploadImage();
})