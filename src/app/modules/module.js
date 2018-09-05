export default class Module {
	constructor(elem) {
		this.elem = elem;

		this.setActive();
	}

	setActive() {
		this.elem.classList.add('loaded');
	}
}
