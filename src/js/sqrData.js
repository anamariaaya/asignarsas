const fieldset = document.querySelector('#fieldset');
const docTipo = document.querySelector('#doc-tipo');
const docId = document.querySelector('#doc-id');

docTipo.addEventListener('change', agregarCampo);

function agregarCampo() {
    if (docTipo.value === 'otro') {
        const label = document.createElement('LABEL');
        label.setAttribute('for', 'doc-otro');
        label.textContent = 'Especifique:';
        const input = document.createElement('INPUT');
        input.setAttribute('type', 'text');
        input.setAttribute('name', 'doc_otro');
        input.setAttribute('id', 'doc-otro');
        input.setAttribute('placeholder', '¿Qué tipo de documento?');

        fieldset.insertBefore(label, docId);
        fieldset.insertBefore(input, docId);
    } else {
        const label = document.querySelector('label[for="doc-otro"]');
        const input = document.querySelector('input[name="doc-otro"]');
        fieldset.removeChild(label);
        fieldset.removeChild(input);
    }
}