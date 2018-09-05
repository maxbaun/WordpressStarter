import Module from './module';

export default class Header extends Module {
	constructor(elem) {
		super(elem);

		console.log('Header Module initialized!!!!!', elem);
	}
}
