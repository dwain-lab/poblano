<script src="https://cdn.tiny.cloud/1/4hzpk0nf0c7okc8slescpg6wcqkxjo7mb3fl5u5nd3i81cx8/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
    tinymce.remove("textarea");

    tinymce.init({
        selector: 'textarea',
        browser_spellcheck: true,
        menubar: false,
        plugins: 'lists, wordcount',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | wordcount',
    });

</script>
