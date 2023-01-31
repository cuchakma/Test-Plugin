const { registerBlockType } = wp.blocks;

import './css/syle.css';
import Edit from "./src/Edit";

registerBlockType('miusage/block-1', {
    title:"Miusage Block",
    description: "This is a test block",
    category: "general",
    edit:Edit
});
