namespace ArchiDox
{
    partial class ReceptionForm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;
        private System.Windows.Forms.MainMenu SearchMenu;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (hDcd != null)
            {
                if (reqID != -1)
                    hDcd.CancelRequest(reqID);
                hDcd.Dispose();
                hDcd = null;
            }

            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(ReceptionForm));
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.pictureBox2 = new System.Windows.Forms.PictureBox();
            this.mainMenu1 = new System.Windows.Forms.MainMenu();
            this.menuItem1 = new System.Windows.Forms.MenuItem();
            this.menuItem2 = new System.Windows.Forms.MenuItem();
            this.button1 = new System.Windows.Forms.Button();
            this.button2 = new System.Windows.Forms.Button();
            this.code = new System.Windows.Forms.TextBox();
            this.seal1 = new System.Windows.Forms.TextBox();
            this.seal2 = new System.Windows.Forms.TextBox();
            this.SuspendLayout();
            // 
            // pictureBox1
            // 
            this.pictureBox1.BackColor = System.Drawing.SystemColors.Control;
            this.pictureBox1.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox1.Image")));
            this.pictureBox1.Location = new System.Drawing.Point(0, 0);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(480, 588);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            // 
            // pictureBox2
            // 
            this.pictureBox2.BackColor = System.Drawing.SystemColors.Control;
            this.pictureBox2.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox2.Image")));
            this.pictureBox2.Location = new System.Drawing.Point(78, 62);
            this.pictureBox2.Name = "pictureBox2";
            this.pictureBox2.Size = new System.Drawing.Size(324, 58);
            this.pictureBox2.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            // 
            // mainMenu1
            // 
            this.mainMenu1.MenuItems.Add(this.menuItem1);
            // 
            // menuItem1
            // 
            this.menuItem1.MenuItems.Add(this.menuItem2);
            this.menuItem1.Text = "Menu";
            // 
            // menuItem2
            // 
            this.menuItem2.Text = "Wyloguj";
            this.menuItem2.Click += new System.EventHandler(this.exitApp);
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(33, 425);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(414, 36);
            this.button1.TabIndex = 17;
            this.button1.Text = "Prześlij";
            // 
            // button2
            // 
            this.button2.Location = new System.Drawing.Point(33, 479);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(414, 36);
            this.button2.TabIndex = 18;
            this.button2.Text = "Wróć do zamówień";
            this.button2.Click += new System.EventHandler(this.backToSearch);
            // 
            // code
            // 
            this.code.BackColor = System.Drawing.SystemColors.Control;
            this.code.ForeColor = System.Drawing.SystemColors.Window;
            this.code.Location = new System.Drawing.Point(33, 144);
            this.code.Name = "code";
            this.code.Size = new System.Drawing.Size(414, 41);
            this.code.TabIndex = 21;
            this.code.Text = "Kod pudła";
            // 
            // seal1
            // 
            this.seal1.BackColor = System.Drawing.SystemColors.Control;
            this.seal1.ForeColor = System.Drawing.SystemColors.Window;
            this.seal1.Location = new System.Drawing.Point(33, 225);
            this.seal1.Name = "seal1";
            this.seal1.Size = new System.Drawing.Size(413, 41);
            this.seal1.TabIndex = 22;
            this.seal1.Text = "Kod plomby 1";
            // 
            // seal2
            // 
            this.seal2.BackColor = System.Drawing.SystemColors.Control;
            this.seal2.ForeColor = System.Drawing.SystemColors.Window;
            this.seal2.Location = new System.Drawing.Point(33, 305);
            this.seal2.Name = "seal2";
            this.seal2.Size = new System.Drawing.Size(413, 41);
            this.seal2.TabIndex = 23;
            this.seal2.Text = "Kod plomby 2";
            // 
            // ReceptionForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(192F, 192F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Dpi;
            this.ClientSize = new System.Drawing.Size(480, 588);
            this.Controls.Add(this.seal2);
            this.Controls.Add(this.seal1);
            this.Controls.Add(this.code);
            this.Controls.Add(this.pictureBox2);
            this.Controls.Add(this.button2);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.pictureBox1);
            this.KeyPreview = true;
            this.Location = new System.Drawing.Point(0, 0);
            this.Menu = this.mainMenu1;
            this.Name = "ReceptionForm";
            this.Text = "ArchiDox for Windows";
            this.TopMost = true;
            this.WindowState = System.Windows.Forms.FormWindowState.Maximized;
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.PictureBox pictureBox2;
        private System.Windows.Forms.MainMenu mainMenu1;
        private System.Windows.Forms.MenuItem menuItem1;
        private System.Windows.Forms.MenuItem menuItem2;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button button2;
        private System.Windows.Forms.TextBox code;
        private System.Windows.Forms.TextBox seal1;
        private System.Windows.Forms.TextBox seal2;
    }
}

