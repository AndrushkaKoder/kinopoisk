//delete button

function removeElement() {
	let removeForms = document.querySelectorAll('.delete_form');
	for (let form of removeForms) {
		form.querySelector('button').addEventListener('click', (e) => {
			e.preventDefault();

			if (confirm('Удалить категорию?')) {
				let id = form.querySelector('input').value;
				if (id) {
					ajax('/admin/categories/remove', id, 'post');
					form.closest('li').remove();
				}
			}
		})
	}
}

function ajax(url, data, method = 'post') {
	let response = false;
	let xhr = new XMLHttpRequest();
	xhr.open(method, url, true);
	let formdata = new FormData();
	formdata.append('id', data)
	xhr.send(formdata);
}

removeElement();
