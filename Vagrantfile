# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  # Base box image
  config.vm.box = "ubuntu/jammy64"

  # Configure a name for the VM
  config.vm.hostname = "bricks"
  config.vm.define "bricks"

  # Change the name in Virtualbox
  config.vm.provider "virtualbox" do |v|
    v.name = "bricks"
  end

  # Add a host-only network interface
  config.vm.network "private_network", type: "dhcp"


  ## Apache & PHP

  # Environment variable to disable warning from apt
  apt_env = {"DEBIAN_FRONTEND" => "noninteractive", "TZ" => "Europe/Paris"}

  # apt update or our `apt install` could fail
  config.vm.provision "shell", inline: "apt-get update", env: apt_env

  # Install some usefull tools for debugging
  config.vm.provision "shell", inline: "apt-get install -y net-tools vim", env: apt_env

  # Install Apache2 & PHP
  config.vm.provision "shell", inline: "apt-get install -y apache2", env: apt_env
  config.vm.provision "shell", inline: "apt-get install -y php libapache2-mod-php", env: apt_env

  ## Installing files, the folder containing the Vagrantfile is mounted on `/vagrant`
  # copy Apache2 configuration
  config.vm.provision "shell", inline: "cp /vagrant/config/apache2.conf /etc/apache2/apache2.conf -v"
  config.vm.provision "shell", inline: "cp /vagrant/config/000-default.conf /etc/apache2/sites-available/000-default.conf -v"

  # copy Bricks files
  config.vm.provision "shell", inline: "cp -r /vagrant/bricks/ /var/www/bricks/ -v"


  ## MySQL database

  # Install MySQL
  config.vm.provision "shell", inline: "apt-get install -y mysql-server php-mysql", env: apt_env

  # Enable the extension in the PHP configuration
  config.vm.provision "shell", inline: "echo 'extension=mysqli' >> /etc/php/8.1/cli/php.ini"
  
  # Run the SQL service
  config.vm.provision "shell", inline: "systemctl start mysql; systemctl status mysql"
  
  # Populate the SQL database
  config.vm.provision "shell", inline: "mysql < /vagrant/config/setup.sql"
  
  # Start Apache2
  config.vm.provision "shell", inline: "systemctl reload apache2" # apply the new config
  config.vm.provision "shell", inline: "systemctl start apache2; systemctl status apache2"

  # Copy the /etc/issue file
  config.vm.provision "shell", inline: "cp /vagrant/config/issue /etc/issue -v"

  # Indicate the IP address
  config.vm.provision "shell", inline: "echo \"Bricks' IP is : $(ip addr show | grep 'inet ' | tail -n 1 | awk '{print $2}' | cut -d '/' -f 1)\""
end
