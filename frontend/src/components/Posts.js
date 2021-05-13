import { fetchPosts } from '../API/api.js';
import Post from './Post.js';
import React, { useState } from 'react';

function Posts() {
    const [posts, setPosts] = useState([]);
    const [executing, setExecuting] = useState(false);

    function getPostsFromWp() {
        if (posts.length) return;
        if (executing) return;
        setExecuting(true);

        fetchPosts()
            .then(response => response.json())
            .then(data => setPosts(data));
    }

    getPostsFromWp();
    // console.log(posts)
    return (
        <div>
            { (! posts.length) && (
                <h2> Loading Posts... </h2> 
            ) }

            { (posts.length) && (
                <div>
                    <h2> Posts on this site: </h2>
                    { posts.map(post => <Post ID={post.id} title={post.title} content={post.content} excerpt={post.excerpt} />) }
                </div>
            ) }
        </div>
    );
}

export default Posts;