import header from './modules/header';

const DataModules = {
	header: header
};

export default () => {
	const modules = Array.from(document.querySelectorAll('[data-module]'));
	modules.forEach(module => {
		const moduleName = module.getAttribute('data-module');
		if (DataModules[moduleName] && typeof DataModules[moduleName] === 'function') {
			return new DataModules[moduleName](module);
		}

		console.info(`module ${module.getAttribute('data-module')} does not exist`);
	});
};
