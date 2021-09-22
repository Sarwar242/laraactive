import React, { Component } from 'react';
import axios from "axios";
import wave from './wave.png'
import bg from './bg.svg'
import avatar from './avatar.svg'

class Login extends Component {

    constructor(props){
        super(props);

        this.state = {
            email : '',
            password : ''
        }

        this.takeEmail = this.takeEmail.bind(this);
        this.takePassword = this.takePassword.bind(this);
        this.handleSubmit2 = this.handleSubmit2.bind(this);
    }


    takeEmail(event){

        this.setState({email : event.target.value})
    }

    takePassword(event){
        this.setState({password : event.target.value})
    }

    handleSubmit2(){
        // alert('test');
        const packets = {
            email: this.state.email,
            password: this.state.password
        };
        axios.post('/loginpost', packets)
            .then(
                response => alert(JSON.stringify(response.data))

                )
            .catch(error => {
                console.log("ERROR:: ",error.response.data);

                });
    }

    render(){
        return (
          <div>
            <img className="wave" src={wave} alt="img"/>
            <div className="container">
                <div className="img">
                    <img src={bg} alt="img"/>
                </div>
                <div className="login-content">
                    <div className="form">
                        <img src={avatar} alt="img"/>
                        <h2 className="title">Login</h2>


                           <div className="input-div pass">
                              <div className="i">
                                   <i className="fas fa-envelope-square"></i>
                              </div>
                              <div className="div">
                                   <h5></h5>
                                   <input type="email" placeholder="Email" onChange={this.takeEmail} className="input" />
                           </div>
                        </div>


                           <div className="input-div pass">
                              <div className="i">
                                   <i className="fas fa-lock"></i>
                              </div>
                              <div className="div">
                                   <h5></h5>
                                   <input type="password" placeholder="Password" onChange={this.takePassword} className="input" />
                           </div>
                        </div>


                        <input type="submit" className="btn" onClick={this.handleSubmit2} value="Login"/>
                    </div>
                </div>
            </div>

                </div>
        );
    }
}
export default Login;
