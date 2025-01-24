document.addEventListener('DOMContentLoaded', () => {
  // Toggle collapsible sections
  const collapsibles = document.querySelectorAll('.category-title');

  collapsibles.forEach((collapsible) => {
    collapsible.addEventListener('click', () => {
      const checkboxContainer = collapsible.nextElementSibling;

      if (checkboxContainer && checkboxContainer.classList.contains('checkbox-container')) {
        const isExpanded = checkboxContainer.style.display === 'block';

        // Toggle visibility
        checkboxContainer.style.display = isExpanded ? 'none' : 'block';

        // Rotate caret icon
        const caretIcon = collapsible.querySelector('svg');
        if (caretIcon) {
          caretIcon.style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
          caretIcon.style.transition = 'transform 0.3s ease';
        }
      }
    });
  });

  // İlçe seçimini dinleyen kod
  const districtsDropdown = document.getElementById('districts');
  const selectedDistrictDiv = document.getElementById('selected-district');

  districtsDropdown.addEventListener('change', () => {
    const selectedDistrict = districtsDropdown.value;
    if (selectedDistrict) {
      selectedDistrictDiv.textContent = `Seçilen İlçe: ${selectedDistrict}`;
    } else {
      selectedDistrictDiv.textContent = '';
    }
  });



});

$(document).ready(function () {
  // Favori butonlarına tıklama olayını ata
  $('.fav-icon').on('click', function () {
    const restaurantID = $(this).data('id'); // Tıklanan SVG'nin data-id değerini al
    const svgElement = $(this); // SVG elementini seç

    $.ajax({
      url: `/favorites/toggle/${restaurantID}`,
      method: 'POST',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content') // CSRF tokeni al
      },
      success: function (response) {
        if (response.success) {
          if (response.added) {
            svgElement.attr('fill', 'red');  // SVG rengi kırmızı yap
            svgElement.addClass('favorited');
            Swal.fire({
              icon: 'success',
              title: 'Favorilerinize eklendi.',
            });
          } else {
            svgElement.attr('fill', 'black'); // SVG rengi siyah yap
            svgElement.removeClass('favorited');
            Swal.fire({
              icon: 'success',
              title: 'Favorilerinizden kaldırıldı.',
            });
          }
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Bir hata oluştu.',
            text: response.message,
          });
        }
      },
      error: function (xhr) {
        Swal.fire({
          icon: 'error',
          title: 'İşlem başarısız!',
          text: xhr.statusText,
        });
      }
    });
  });
});

