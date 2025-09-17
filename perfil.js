const uploadInput = document.getElementById('upload-input');
const profileImg = document.getElementById('profile-img');

uploadInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (file) {
    const imageURL = URL.createObjectURL(file);
    profileImg.src = imageURL;
    profileImg.onload = () => {
      URL.revokeObjectURL(imageURL);
    };
  }
});

  // document.getElementById('fotoInput').addEventListener('change', function (event) {
  //       const file = event.target.files[0];
  //       if (file && file.type.startsWith('image/')) {
  //           const reader = new FileReader();
  //           reader.onload = function (e) {
  //               document.getElementById('fotoPerfil').src = e.target.result;
  //           };
  //           reader.readAsDataURL(file);
  //       }
  //   });