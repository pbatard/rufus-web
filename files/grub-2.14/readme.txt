core.img was created from https://ftp.gnu.org/gnu/grub/grub-2.14.tar.xz on a Debian 13 x64 system,
with https://github.com/gentoo/gentoo/raw/d51cbeb087dbbe979ff29af645f32071cce2834d/sys-boot/grub/files/grub-2.14-revert-image-base.patch
applied, since GRUB are apparently unable to perform BASIC testing of their releases:
https://lists.gnu.org/archive/html/grub-devel/2026-01/msg00043.html, using the commands:
  patch -p1 < grub-2.14-revert-image-base.patch
  ./autogen.sh
  ./configure --disable-nls --enable-boot-time
  make -j4
  cd grub-core
  ../grub-mkimage -v -O i386-pc -d. -p\(hd0,msdos1\)/boot/grub biosdisk fat exfat ext2 ntfs ntfscomp part_msdos -o core.img
