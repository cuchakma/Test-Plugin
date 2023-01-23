import React, { useEffect, useState } from "react";
import '../assets/UserList.css';


const UserList = () => {

    const [headers, setheaders] = useState([]);
    const [list, setist] = useState([]);

    useEffect(() => {
        const fetchData = fetch('https://miusage.com/v1/challenge/1/ ');
        fetchData.then((response) => {
            return response.json();
        }).then((list) => {
            setheaders(list.data.headers);
            setist(list.data.rows);
        });
    }, [setist.length]);
  
    return (
        <div className={'miusage-users-list'}>
            <div className="miusage-headers">
                {headers.length > 0 && headers.map((value) => {
                    return <span>{value}</span>
                })}
            </div>
        </div>
    );
}

export default UserList;