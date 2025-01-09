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

  function restoranEkle(imgPath, restoranAdi, konum) {
    let restaurantCards = document.querySelector('#restaurant-cards');
    restaurantCards.innerHTML +=
      `
        <div class="col-md-3 mb-5">
            <div class="restaurant-card">
                <img src="${imgPath}" alt="Restoran">
                <div class="restaurant-card-body">
                    <h5>${restoranAdi}</h5>
                    <p>İki kişilik menüde %20 indirim!</p>
                    <p>📍 ${konum}</p>
                    <a href="rezervasyon.html" class="btn btn-danger">Hemen Rezervasyon Yap</a>
                </div>
            </div>
        </div>
   `;
  }

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