import React from 'react';
import ReactDom from 'react-dom';
import Wrapper from './components/Wrapper';
import Header from './components/Header';
import UserList from './components/UserList';

ReactDom.render(
    <Wrapper>
        <Header/>
        <UserList/>
    </Wrapper>,
    document.getElementById('miusage')
);

