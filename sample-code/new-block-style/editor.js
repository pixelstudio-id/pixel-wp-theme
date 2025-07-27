import './editor.sass';

const { wp } = window;

wp.blocks.registerBlockStyle('core/xxx', {
  name: 'my-custom',
  label: 'Custom',
});
