<style>
	main {
    display: flex;
    justify-content: center;
}

.input {
    border: 1px solid gray;
}

.login-wrap {
    width: 100%;
    margin: 20px 0 50px 0;
    max-width: 525px;
    min-height: 670px;
    position: relative;
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
}

.login-html {
    width: 100%;
    height: 100%;
    position: absolute;
    padding: 90px 70px 50px 70px;
    background: #f3f3f3;
}

.login-html .sign-in-htm,
.login-html .sign-up-htm {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: all .4s linear;
}

.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check {
    display: none;
}

.login-html .tab,
.login-form .group .label,
.login-form .group .button-form {
    text-transform: uppercase;
}

.login-html .tab {
    font-size: 22px;
    margin-right: 15px;
    padding-bottom: 5px;
    margin: 0 15px 10px 0;
    display: inline-block;
    border-bottom: 2px solid transparent;
}

.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab {
    color: gray;
    border-color: gray;
}

.login-form {
    min-height: 345px;
    position: relative;
    perspective: 1000px;
    transform-style: preserve-3d;
}

.login-form .group {
    margin-bottom: 15px;
}

.login-form .group .label,
.login-form .group .input,
.login-form .group .button-form {
    width: 100%;
    color: #fff;
    display: block;
}

.login-form .group .input,
.login-form .group .button-form {
    border: none;
    padding: 15px 20px;
    border-radius: 25px;
    background: rgba(255, 255, 255, .1);
}

.login-form .group input[data-type="password"] {
    -webkit-text-security: disc;
}

.login-form .group .label {
    color: #aaa;
    font-size: 15px;
    margin-bottom: 5px;
}

.login-form .group .button-form {
    background: gray;
}

.login-form .group label .icon {
    width: 15px;
    height: 15px;
    border-radius: 2px;
    position: relative;
    display: inline-block;
    background: rgba(255, 255, 255, .1);
}

.login-form .group label .icon:before,
.login-form .group label .icon:after {
    content: '';
    width: 10px;
    height: 2px;
    background: #fff;
    position: absolute;
    transition: all .2s ease-in-out;
}

.login-form .group label .icon:before {
    left: 3px;
    width: 5px;
    bottom: 6px;
    transform: scale(0) rotate(0);
}

.login-form .group label .icon:after {
    top: 6px;
    right: 0;
    transform: scale(0) rotate(0);
}

.login-form .group .check:checked + label {
    color: black;
}

.login-form .group .check:checked + label .icon {
    background: gray;
}

.login-form .group .check:checked + label .icon:before {
    transform: scale(1) rotate(45deg);
}

.login-form .group .check:checked + label .icon:after {
    transform: scale(1) rotate(-45deg);
}

.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm {
    transform: rotate(0);
}

.login-html .sign-up:checked + .tab + .login-form .sign-up-htm {
    transform: rotate(0);
}

.hr {
    height: 2px;
    margin: 60px 0 50px 0;
    background: rgba(255, 255, 255, .2);
}

.foot-lnk {
    text-align: center;
}

.fogot-pass {
    text-decoration: none;
    color: gray;
}

.fogot-pass:hover {
    text-decoration: none;
    color: black;
    font-weight: 600;
}

.tab:hover, .tab-1:hover {
    color: black;
    cursor: pointer;
    transform: scale(1.1);
    font-weight: 600;
}

.login-form .group input[type="text"],
.login-form .group input[type="password"] {
    caret-color: black;
    border: 1px solid gray;
    border-radius: 10px;
    color: black;
}

.button-form:hover {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}

.error-message {
    font-size: 14px;
    color: red;
}
</style>