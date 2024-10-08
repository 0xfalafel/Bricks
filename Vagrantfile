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

  # Environment variable to disable warning from apt
  apt_env = {"DEBIAN_FRONTEND" => "noninteractive", "TZ" => "Europe/Paris"}

  # Install some usefull tools for debugging
  config.vm.provision "shell", inline: "apt-get install -y net-tools vim", env: apt_env

  # Install Apache2 & PHP
  config.vm.provision "shell", inline: "apt-get install -y apache2", env: apt_env
  config.vm.provision "shell", inline: "apt-get install -y php libapache2-mod-php", env: apt_env

  # Apache2 configuration
end
