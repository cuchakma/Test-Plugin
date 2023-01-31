const { registerBlockType } = wp.blocks;

import './css/syle.css';
import Edit from "./src/Edit";

const attributes = {
    showColums:{
        type:'boolean',
        default:true
    }
};
registerBlockType('miusage/block-1', {
    title:"Miusage Block",
    description: "This is a test block",
    attributes,
    category: "common",
    edit:Edit
});
