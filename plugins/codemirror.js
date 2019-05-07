import Vue from 'vue'
import { CodeMirror, codemirror, install } from 'vue-codemirror'

import '~/plugins/leekscript-mode.js'
import '~/plugins/runmode.js'

Vue.use({ CodeMirror, codemirror, install })
Vue.mixin({
	data: function() {
		return {
			CodeMirror
		}
	}
})