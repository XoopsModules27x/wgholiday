/**
 * Method toggles checkboxes to initiating checkbox.
 * @param {HTMLElement} element Clicked checkbox
 */
function toggleCheckboxGroupPerm (element) {
    var toggle_checked = false;
    el = document.getElementById('all_'+element+'1');
    toggle_checked = el.checked;

    for (var i = 1; i < 10; i++) {
        el = document.getElementById(''+element+i);
        if ( el !== null ) { el.checked = toggle_checked;}
    }
};