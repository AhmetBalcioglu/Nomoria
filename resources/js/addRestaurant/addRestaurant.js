
    document.getElementById('add-detail').addEventListener('click', function() {
    const container = document.getElementById('details-container');
    const newDetail = `
            <div class="d-flex align-items-center mb-3">
                <select class="form-select custom-select me-2" name="details[]">
                    <option value="sertifika">Sertifika Ekle</option>
                    <option value="menu">Menü Ekle</option>
                    <option value="diger">Diğer</option>
                </select>
                <input type="file" class="form-control custom-input" name="files[]" accept=".jpg,.png,.pdf">
            </div>`;
    container.insertAdjacentHTML('beforeend', newDetail);
});

