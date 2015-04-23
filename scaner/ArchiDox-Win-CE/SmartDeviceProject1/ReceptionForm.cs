using System;
using System.Linq;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using System.Resources;
using System.Net;
using System.IO;
using Newtonsoft.Json;
using Newtonsoft.Json.Converters;
using Newtonsoft.Json.Linq;
using System.Collections.Specialized;
using Microsoft.WindowsCE.Forms;
using Datalogic.API;
using System.Text.RegularExpressions;

namespace ArchiDox

{

    public partial class ReceptionForm : Form
    {
        private DateTime appStart;
        private bool scan;
        private bool listLoaded;
        private string fn;
        private string app_path;
        public TextWriter errStream;
        private List<Order> ordersBuffer;
        private ListBox ordersListBox;
        private DecodeHandle hDcd;
        private int reqID;
        private ReceptionWndMessageWindow wndMsg;
        private DecodeRequest reqType;
        private int order_id;

        private string SendData(string method, string url, string data)
        {

            string host = ArchiDox.Properties.Resources.archidoxHOST;
            string full_url = @"http://" + host + url;
            Console.SetError(this.errStream);
            Console.Error.WriteLine("Send data started");
            Console.Error.WriteLine("Params: " + full_url);

            try
            {
                HttpWebRequest request = (HttpWebRequest)WebRequest.Create(full_url);
                
                request.KeepAlive = false;
                request.Method = method;

                request.Credentials = CredentialCache.DefaultCredentials;
                // turn our request string into a byte stream
                byte[] postBytes;

                if (data != null)
                {
                    postBytes = Encoding.UTF8.GetBytes(data);
                }
                else
                {
                    postBytes = new byte[0];
                }

                Console.Error.WriteLine(postBytes.Length);

                request.ContentType = "application/x-www-form-urlencoded";
                request.ContentLength = postBytes.Length;

                Stream requestStream = request.GetRequestStream();

                // now send it
                requestStream.Write(postBytes, 0, postBytes.Length);
                requestStream.Close();

                HttpWebResponse response;

                response = (HttpWebResponse)request.GetResponse();

                Stream dataStream = response.GetResponseStream();

                StreamReader reader = new StreamReader(dataStream);
                // Read the content.
                string responseFromServer = reader.ReadToEnd();

                // Clean up the streams and the response.
                reader.Close();
                response.Close();
                Console.Error.Flush();
                return responseFromServer;
            }
            catch (Exception ex)
            {
                Console.Error.WriteLine("Send data failed");
                Console.Error.WriteLine("Send data: "+ex.Message);
                return @" ";
            }
        }

        public ReceptionForm()
        {
            this.appStart = DateTime.Now;
            //this.app_path = Environment.GetFolderPath(Environment.SpecialFolder.Personal);
            this.app_path = @"\Storage Card\ArchiDox\";
            this.fn = app_path + @"\error_log-" + appStart.ToString("yyyyMMdd") + ".log";
            this.errStream = new StreamWriter(fn, true);
            Console.SetError(this.errStream);
            Console.Error.WriteLine("Reception form initilized");

            InitializeComponent();
        }

        private void clearSearchBox(object sender, EventArgs e)
        {
            this.code.Text = "";
        }

        private void exitApp(object sender, EventArgs e)
        {
            Console.Error.Close();
            Application.Exit();
        }

        public void SetDcdText(int msgReqID)
        {
            CodeId cID = CodeId.NoData;
            string dcdData = "";

            try
            {
                dcdData = hDcd.ReadString(msgReqID, ref cID);
            }
            catch (Exception ex)
            {
                Console.Error.WriteLine("String read error: " + ex.Message);
                Console.Error.Flush();
                return;
            }
        }

        private void backToSearch(object sender, EventArgs e)
        {
            Console.Error.Flush();
            Console.Error.Close();
            this.errStream.Close();
            Form sf = new SearchForm();
            sf.Show();
            this.Hide();
        }

    }
}