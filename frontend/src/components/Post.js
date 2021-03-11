import React from 'react';

function Post(props) {
  const { ID, title, excerpt } = props;

  return (
    <div key={`post-${ID}`} className="post">
        <h3 dangerouslySetInnerHTML={{ __html: title.rendered }}></h3>

        <div>
            <div dangerouslySetInnerHTML={{ __html: excerpt.rendered }} />
        </div>

        <a >Read More</a>
    </div>
  );
}

export default Post;