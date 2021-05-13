export function wpFetch (endpoint) {
    // const requestOptions = {
    //     method: 'GET'
    //     // headers: { 
    //     //     'Content-Type': 'application/json',
    //     //     'Authorization': 'Bearer my-token',
    //     //     'My-Custom-Header': 'foobar'
    //     // },
    //     // body: JSON.stringify({ title: 'React POST Request Example' })
    // };
    
    return fetch(`http://${process.env.REACT_APP_WP_HOST}/wp-json/wp/v2/${endpoint}`);
    
}

export function fetchPosts (id) {
    if (! id) {
        return wpFetch('posts');
    }

    return wpFetch(`post/${id}`);
}

export function fetchPages (id) {
    if (! id) {
        return wpFetch('pages');
    }

    return wpFetch(`page/${id}`);
}

export default wpFetch;