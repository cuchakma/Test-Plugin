import React, { useEffect, useState } from "react";
import { LineWave } from  'react-loader-spinner';
import "../assets/UserList.css";

const UserList = () => {
  const [list, setList]                 = useState([]);
  const [showButton, setShowButton]     = useState(true);
  const [counter, setCounter]           = useState(1);
  const [showLoader, setLoader]         = useState(true);
  const [loadMoreText, setloadMoreText] = useState('Show List');
  let headers                           = ['ID', 'First Name', 'Last Name', 'Email', 'Date'];

  useEffect(() => {
    let fetchList = fetch( miusage.miusage_json_url + '?number='+counter);
    fetchList.then((response) => {
      if( response.status == 200 ) {
        setLoader(false);
        setloadMoreText('Show List');
       return response.json();
      }
    }).then((list) => {
      setList(list);
    });
  }, [counter]);

  function setClickedState(event) {
    setloadMoreText('Loading....');
    if( list.length + 1 === parseInt( miusage.miusage_users_number ) ) {
      setShowButton(false);
    }
    setCounter((prevData) => {
      return prevData + 1;
    });
  }

  let list_keys = Object.keys(list);

  return (
    <div className={"miusage-users-list"}>
       {showLoader && <LineWave height="100" width="100" color="#4fa94d" ariaLabel="line-wave" wrapperStyle={''} wrapperClass={'miusage-line-wave'} visible={true} firstLineColor="" middleLineColor="" lastLineColor=""/>}
       {!showLoader && <table className={"miusage-users-table"}>
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
        }
      </table>}
      { !showLoader && (showButton == true && <button className="misuage-show-list" onClick={setClickedState}>{loadMoreText}</button>)}
    </div>
  );
};

export default UserList;
