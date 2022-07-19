import React from 'react';
import { BsTwitter, BsInstagram } from 'react-icons/bs';
import { FaFacebookF } from 'react-icons/fa';

const SocialMedia = () => (
  <div className="app__social">
    <div>
      <a href="https://www.twitter.com/brycejguglietti/" target = "react/jsx-no-target-blank">
        <BsTwitter />
      </a>
    </div>
    <div>
      <a href="https://www.facebook.com/bryce.guglietti.3/" target = "react/jsx-no-target-blank">
        <FaFacebookF />
      </a>
    </div>
    <div>
      <a href="https://www.instagram.com/bryceguglietti/" target = "react/jsx-no-target-blank">
        <BsInstagram />
      </a>
    </div>
  </div>
);

export default SocialMedia;