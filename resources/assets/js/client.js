var axios = require('axios');
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

window.client = {
	get(url, params) {
		return this.send('get', url, params);
	},

	post(url, params) {
		return this.send('post', url, params);
	},

	put(url, params) {
		return this.send('put', url, params);
	},

	delete(url, params) {
		return this.send('delete', url, params);
	},

	send(method, url, params) {
		params = this.getParams(method, params);

		return new Promise(function (resolve, reject) {
			axios[method](url, params)
				.then(response => resolve(response))
				.catch(error => reject(error.response));
		});
	},

	getParams(method, params) {
		params = params || {};
		return (method === 'get') ? { params } : params;
	},

	all(...promises) {
		return new Promise(function (resolve, reject) {
			axios.all(promises).then(axios.spread(function (acct, perms) {
    			resolve();
			}))
		});
	},
}