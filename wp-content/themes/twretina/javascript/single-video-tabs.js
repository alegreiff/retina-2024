// Constantes
//const tabs = document.querySelectorAll('ul#tabsaula li');
const tabs = document.querySelectorAll('#myTab li button');
const tabsContent = document.querySelectorAll('#tab-content > div');

console.log({ tabs, tabsContent });

tabs.forEach((tab) => {
	tab.addEventListener('click', () => {
		tabs.forEach((item) => {
			item.classList.remove('bg-purple-500');
		});

		tab.classList.add('bg-purple-500');
		console.log('TAB', tab);
		const target = tab.dataset['tabsTarget'];

		tabsContent.forEach((box) => {
			if (box.getAttribute('id') == target) {
				box.classList.remove('hidden');
			} else {
				box.classList.add('hidden');
			}
		});
	});
});
