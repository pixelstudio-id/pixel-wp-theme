/**
 * Simple GET and POST functions that return Promise.
 *
 * Reference:
 *   axios-lite https://github.com/piyas1234/react-server-request
 *
 * Example:
 *
 *   import PixelFetch from '@lib/PixelFetch'
 *
 *   const myFetch = new PixelFetch('https://mysite.com/wp-json/my/v1');
 *   try {
 *     const result = await myFetch.get('/posts');
 *     const response = await myFetch.post('/create-post', {...});
 *   } catch (error) {
 *     console.log(error);
 *   }
 */
export class PixelFetch {
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
    if (cached && cached !== 'undefined') {
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
    if (cached && cached !== 'undefined') {
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

  /**
   * Do a POST request
   *
   * @param string apiPath
   * @param mixed body - can be a <form> Element or object
   */
  async post(apiPath, body) {
    let bodyData = null;
    let { headers } = this;

    if (body instanceof Element) {
      bodyData = new FormData(body);
      headers = {};
    } else {
      bodyData = JSON.stringify(body);
    }

    try {
      const response = await fetch(this.url + apiPath, {
        method: 'POST',
        body: bodyData,
        headers,
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

const pxFetch = new PixelFetch();
const myFetch = new PixelFetch(myUrl, headers);
const wpFetch = new PixelFetch(wpUrl, headers);

export default PixelFetch;
export { pxFetch, myFetch, wpFetch };
