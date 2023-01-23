import React from "react";

const Wrapper = (props) => {
    return (
        <div className={'miusage-parent-wrapper'}>
            {props.children}
        </div>
    )
}

export default Wrapper;