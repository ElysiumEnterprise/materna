const imgPerfil = document.querySelector('.img-perfil');

const fileImgPerfil = document.querySelector('#imgPerfil')

const dropAreaBanner = document.querySelector('#drag-area-banner');
const fileBanner = document.querySelector('#imgCapa');
const viewBanner = document.querySelector('.img-view-banner');

fileImgPerfil.addEventListener('change', function (event) {
    var file = event.target.files[0];
    let linkImg = URL.createObjectURL(file);

    if (file) {
        imgPerfil.src=linkImg
    } else {
        imgPerfil.src='{{asset("assets/img/foto-perfil/".$perfil->fotoPerfil)}}'
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