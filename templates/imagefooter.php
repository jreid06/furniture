    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
    <script src="https://use.fontawesome.com/7c0f3e2f67.js"></script>
    <script type="text/javascript">
        var imageCloseIcon = document.getElementById('closeImagePage'),
            pageLocation = window.location.pathname.replace('/',''),
            bodyID = document.getElementById('imagePageStyling');

        imageCloseIcon.addEventListener('click', function(){
            window.close();
        });

        console.log(pageLocation);
        if (pageLocation === 'image') {
            bodyID.classList.add('bodyColour');
        }


    </script>
</body>
</html>
