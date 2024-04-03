<script>
    $(document).ready(function() {
    $(".sd-CustomSelect").multipleSelect({
      selectAll: false,
      onOptgroupClick: function(view) {
        $(view).parents("label").addClass("selected-optgroup");
      }
    });
  });

//   document.addEventListener("DOMContentLoaded", function() {
//         const competencesSelect = document.getElementById('competences-select');
//         competencesSelect.addEventListener('change', function() {
//             const placeholderOption = competencesSelect.querySelector('option[value=""]');
//             if (placeholderOption && !placeholderOption.selected) {
//                 placeholderOption.remove();
//             }
//         });
//     });

    function updateFileName(input) {
        var label = document.getElementById('file-label');
        var fileName = input.files[0].name;
        label.innerHTML = fileName;
    }
</script>