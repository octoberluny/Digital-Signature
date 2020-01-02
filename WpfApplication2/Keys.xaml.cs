using Microsoft.Win32;
using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Numerics;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Forms;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace WpfApplication2
{
    /// <summary>
    /// Interaction logic for Keys.xaml
    /// </summary>
    public partial class Keys : Window
    {
        public Keys()
        {
            InitializeComponent();
            generateKeys();
        }

        Random rand = new Random();
        public int publicKey, p, q, result;//публичный ключ

        public void generateKeys()
        {
            p = rand.Next(1000, 30000);
            q = rand.Next(1000, 30000);

            BigInteger m = p * q;
            BigInteger n = Math.Abs((p - 1) * (q - 1)); //считаем функцию Эйлера

            publicKey = rand.Next(1, (int)n-1);
            
                while (isPrime(publicKey) || isPrime(publicKey, (int)n))
                    publicKey = rand.Next(2, (int)n - 1);

                textBox.Text = publicKey.ToString();
            result = publicKey;
            int d_ = Calculate_d(publicKey, (int)n);
            textBox1.Text = d_.ToString();
        }

        private int Calculate_d(int e, int n)
        {
            int d = rand.Next(1, n - 1);
            while (true)
            {
                if ((d * e) % n == 1)
                    break;
                else
                    d++;
            }
            return d;
        }

        private bool isPrime(int x)
        {
            for (int i = 2; i < x / 2 + 1; i++)
                if ((x % i) == 0)
                    return true;
            return false;
        }

        private bool isPrime(int x, int n)
        {
            if ((n % x) == 0)
                return true;
            return false;
        }

        
        private void button2_Click(object sender, RoutedEventArgs e)
        {
            MainWindow mainwind = new MainWindow();
            mainwind.Show();
            this.Close();
        }

        private void button_Click(object sender, RoutedEventArgs e)
        {
            Microsoft.Win32.SaveFileDialog dlg = new Microsoft.Win32.SaveFileDialog();
            dlg.FileName = "PrivateKey"; // Default file name
            dlg.DefaultExt = ".text"; // Default file extension
            dlg.Filter = "Text documents (.txt)|*.txt"; // Filter files by extension

            // Show save file dialog box
            Nullable<bool> result = dlg.ShowDialog();

            // Process save file dialog box results
            if (result == true)
            {
                // Save document
                string filename = dlg.FileName;
                using (System.IO.StreamWriter file = new System.IO.StreamWriter(filename, false))
                {
                    file.WriteLine(textBox1.Text);
                }
            }
        }

        private void button1_Click(object sender, RoutedEventArgs e)
        {
            System.IO.File.WriteAllText(@"..\..\publicKey.txt", textBox.Text);
            ClienInfo cinfo = new ClienInfo();
            cinfo.Show();
        }

        private void fMain_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (e.Cancel == true)
            {
                Environment.Exit(0);
            };
        }
    }
}