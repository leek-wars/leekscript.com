const LeekScript = {
	api: 'https://leekwars.com/api/',
	post, put, get, del,
	drawerOpened: null
}

function request<T = any>(method: string, url: string, params?: any) {
	const xhr = new XMLHttpRequest()
	const promise = new Promise<T>((resolve, reject) => {
		xhr.open(method, url)
		xhr.responseType = 'json'
		if (!(params instanceof FormData)) {
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8')
		}
		xhr.onload = (e: any) => {
			if (e.target.status === 200) {
				resolve(e.target.response)
			} else {
				reject(e.target.response)
			}
		}
		xhr.onerror = reject
		xhr.send(params)
	})
	return {
		abort: () => xhr.abort(),
		error: (e: (e: T) => void) => promise.catch(e),
		then: (p: (p: T) => void) => {
			promise.then(p)
			return { error: (e: (e: T) => void) => promise.catch(e) }
		}
	}
}

function post<T = any>(url: any, form: any = {}) {
	if (!(form instanceof FormData)) {
		const f = [] as string[]
		for (const k in form) { f.push(k + '=' + encodeURIComponent(form[k])) }
		form = f.join('&')
	}
	return request<T>('POST', LeekScript.api + url, form)
}
function put<T = any>(url: any, form: any = {}) {
	if (!(form instanceof FormData)) {
		const f = [] as string[]
		for (const k in form) { f.push(k + '=' + encodeURIComponent(form[k])) }
		form = f.join('&')
	}
	return request<T>('PUT', LeekScript.api + url, form)
}
function del<T = any>(url: any, form: any = {}) {
	if (!(form instanceof FormData)) {
		const f = [] as string[]
		for (const k in form) { f.push(k + '=' + encodeURIComponent(form[k])) }
		form = f.join('&')
	}
	return request<T>('DELETE', LeekScript.api + url, form)
}
function get<T = any>(url: any) {
	return request<T>('GET', LeekScript.api + url)
}

export { LeekScript }