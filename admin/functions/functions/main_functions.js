function UpdateImage(imageInput, imageView) {
    imageInput.addEventListener('change', function (event) {
        const image = event.target.files[0];

        if (image) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imageView.src = e.target.result;
            }

            reader.readAsDataURL(image);
        } else {
            console.log('Error')
        }
    })
}