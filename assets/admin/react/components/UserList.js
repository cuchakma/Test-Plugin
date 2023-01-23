import React, { useEffect, useState } from "react";
import "../assets/UserList.css";

const UserList = () => {
  const [headers, setheaders] = useState([]);
  const [list, setist] = useState([]);

  useEffect(() => {
    const fetchData = fetch("https://miusage.com/v1/challenge/1/");
    fetchData
      .then((response) => {
        return response.json();
      })
      .then((list) => {
        setheaders(list.data.headers);
        setist(list.data.rows);
      });
  }, [setist.length]);

  let list_keys = Object.keys(list);

  return (
    <div className={"miusage-users-list"}>
      <table className={"miusage-users-table"}>
        <tr className={"miusage-users-headers"}>
            {
                headers.map((value) => {
                    return <th>{value}</th>
                })
            }
        </tr>
        {
            list_keys.map((value) => {
                return <tr className={"miusage-users-data"}>{
                    Object.values(list[value]).map((value) => {
                        return <td>{value}</td>
                    })
                }</tr>
                
            })
            // <tr>
            //     <td>January</td>
            //     <td>$100</td>
            // </tr>
        }
      </table>
    </div>
  );
};

export default UserList;
