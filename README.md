# kochava

Kochava mini project. 

## Provisioning

Provisioning done with ansible. Ansible is on 1 machine and controls another machine - that means my macbook has this installed in order to control the provided server and install the tech stack. I installed ansible with [this](http://binarynature.blogspot.com/2016/01/install-ansible-on-os-x-el-capitan_30.html) after [setting up ssh keys](https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-16-04). [Added the server IP](http://docs.ansible.com/ansible/latest/intro_inventory.html) to /etc/ansible/hosts on my macbook, and ran `ansible kochava -m ping` to test. Installed on macbook/"added a role" for redis installation from [here](https://github.com/DavidWittman/ansible-redis). New playbook contains instructions to install PHP, Redis, PHPRedis, and Golang. Running the playbook also sets a systemd service to start the PHP application, etc, on server startup.

