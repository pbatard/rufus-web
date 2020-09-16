core.img was created from:
  https://git.savannah.gnu.org/git/grub.git@a6838bbc6726ad624bd2b94991f690b8e9d23c69
on a Debian 10.x x64 system using the commands:
  ./bootstrap
  ./configure --disable-nls --enable-boot-time
  make -j6
  cd grub-core
  ../grub-mkimage -v -O i386-pc -d. -p\(hd0,msdos1\)/boot/grub biosdisk part_msdos fat ntfs exfat -o core.img
