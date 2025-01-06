/**
 * Simple GET and POST functions that return Promise.
 *
 * Reference:
 *   axios-lite https://github.com/piyas1234/react-server-request
 *
 * Example:
 *   const myFetch = new MyFetch('https://mysite.com/wp-json/my/v1');
 *   myFetch.get('/posts');
 *   myFetch.post('/create-post', {...});
 */
export class MyFetch {
  constructor(url, headers) {
    this.url = url || '';
    this.headers = {
      'Content-Type': 'application/json',
      ...headers,
    };
  }

  /**
   * Do a GET request
   */
  async get(apiPath) {
    try {
      const response = await fetch(this.url + apiPath, {
        method: 'GET',
        headers: this.headers,
      });

      if (!response.ok) {
        return Promise.reject(await response.json());
      }

      return response.json();
    } catch (error) {
      console.log(error);
      return Promise.reject(error);
    }
  }

  /**
   * Get data from sessionStorage, if not found then do API request and save it to sessionStorage
   */
  async getFromSession(path) {
    const cached = sessionStorage.getItem(path);
    if (cached) {
      return JSON.parse(cached);
    }

    try {
      const data = await this.get(path);
      sessionStorage.setItem(path, JSON.stringify(data));
      return data;
    } catch (error) {
      return Promise.reject(error);
    }
  }

  /**
   * Get data from localStorage, if not found then do API request and save it to localStorage
   */
  async getFromLocal(path) {
    const cached = localStorage.getItem(path);
    if (cached) {
      return JSON.parse(cached);
    }

    try {
      const data = await this.get(path);
      localStorage.setItem(path, JSON.stringify(data));
      return data;
    } catch (error) {
      return Promise.reject(error);
    }
  }

  async post(apiPath, body) {
    let bodyData = null;
    if (body instanceof Element) {
      bodyData = new FormData(body);
    } else {
      bodyData = JSON.stringify(body);
    }

    try {
      const response = await fetch(this.url + apiPath, {
        method: 'POST',
        body: bodyData,
        headers: this.headers,
      });

      if (!response.ok) {
        return Promise.reject(await response.json());
      }

      return response.json();
    } catch (error) {
      console.log(error);
      return Promise.reject(error);
    }
  }

  async delete(apiPath) {
    try {
      const response = await fetch(this.url + apiPath, {
        method: 'DELETE',
      });

      return response;
    } catch (error) {
      console.log(error);
      return Promise.reject(error);
    }
  }
}

// Initiate the method
const headers = {};
const { nonce, myUrl, wpUrl } = window.myApiSettings;
if (nonce) {
  headers['X-WP-Nonce'] = nonce;
}

const myFetch = new MyFetch();
const wpFetch = new MyFetch(myUrl, headers);

export default MyFetch;
export { myFetch, wpFetch };
