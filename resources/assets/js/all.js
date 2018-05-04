(function ($) {
  $(document).ready(function () {
    
    $('#photo').change(function () {
      var fileName = this.value.substring(this.value.lastIndexOf('\\') + 1, this.value.lenght);
      var extension = fileName.substring(fileName.lastIndexOf('.'), fileName.length).toLowerCase();
      var size = document.getElementById('photo').files[0].size;
      var reader, image, width, height, $photo, cropper;
      var aspectRatio = 1 / 1;
      var photoTmp;

      if (size > 2097152) { //2 megabytes
        alert('O tamanho máximo suportado para envio de arquivos de imagem é de 2 megabytes.');
        return false;
      }

      if (fileName != '' && (extension == '.jpeg' || extension == '.jpg' || extension == '.png')) {
        if (document.getElementById('photo') && document.getElementById('photo').files && document.getElementById('photo').files[0]) {
          reader = new FileReader();

          reader.onloadstart = function () {};

          reader.onloadend = function (e) {
            image = new Image();
            image.src = e.target.result;

            image.onload = function () {
              width = this.width;
              height = this.height;

              photoTmp = {
                data: e.target.result,
                extension: extension,
                width: width,
                heigth: height,
                stream: document.getElementById('photo').files[0]
              };

              document.getElementById('preview').src = photoTmp.data;

              $photo = $('#preview');

              $photo.cropper({
                aspectRatio: aspectRatio,
                viewMode: 1,
                zoomable: false,
                crop: function (event) {
                  $('input#photo-x').val(event.detail.x);
                  $('input#photo-y').val(event.detail.y);
                  $('input#photo-width').val(event.detail.width);
                  $('input#photo-height').val(event.detail.height);
                  /* console.log(event.detail.x);
                  console.log(event.detail.y);
                  console.log(event.detail.width);
                  console.log(event.detail.height);
                  console.log(event.detail.rotate);
                  console.log(event.detail.scaleX);
                  console.log(event.detail.scaleY); */
                }
              }).css('visibility', 'visible');

              // Get the Cropper.js instance after initialized
              cropper = $photo.data('cropper');

              //croper.setAspectRatio;
              $('#aspectRatio1, #aspectRatio2').click(function () {
                aspectRatio = $(this).find('input').val() == 'square' ? 1 / 1 : 16 / 9;
                $photo.cropper('setAspectRatio', aspectRatio);
              });

            };
          };
          
          reader.readAsDataURL(document.getElementById('photo').files[0]);
        }
      } else {
        if (fileName != '') {
          alert('A imagem não está em um formato suportado. Envie utilizando os formatos: JPG, JPEG ou PNG.');
        }
      }
    });

    /* var removerImagemUpload = function () {
      $('#photo').val('');
      $('#photo')[0] = null;
      photoTmp = undefined;
    }; */

    // Filtrar apenas posts do usuario logado
    $('.list-my-posts').click(function (e) {
      e.preventDefault();
      $('#postsById').submit();
    });
  });
})(window.jQuery);