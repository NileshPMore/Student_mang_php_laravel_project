import $ from 'jquery';

import './bootstrap';

import '../css/app.css';

import { createPopper } from '@popperjs/core';
import 'bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.$ = window.jQuery = $;

Alpine.start();
